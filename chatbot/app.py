# Import necessary modules
from flask import Flask, request, jsonify, render_template
from flask_cors import CORS
import json
from difflib import get_close_matches
import traceback

# Initialize Flask application
app = Flask(__name__)
CORS(app)  # Enable Cross-Origin Resource Sharing (CORS) for all requests

# Define file paths for knowledge base and unknown questions
KNOWLEDGE_BASE_FILE = "knowledge_base.json"
UNKNOWN_QUESTIONS_FILE = "unknown_questions.json"

def load_json(file_path: str) -> dict:
    """
    Load JSON data from a file.
    Args:
        file_path (str): Path to the JSON file.
    Returns:
        dict: Parsed JSON data or an empty dictionary if the file is not found or invalid.
    """
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            return json.load(file)
    except (FileNotFoundError, json.JSONDecodeError) as e:
        print(f"Error loading JSON from {file_path}: {e}")
        return {}

def save_json(file_path: str, data: dict):
    """
    Save JSON data to a file.
    Args:
        file_path (str): Path to the JSON file.
        data (dict): Data to be saved in JSON format.
    """
    try:
        with open(file_path, 'w', encoding='utf-8') as file:
            json.dump(data, file, indent=2)
    except Exception as e:
        print(f"Error saving JSON to {file_path}: {e}")

def find_closest_match(user_question: str, questions: list[str]) -> str:
    """
    Find the closest matching question from a list.
    Args:
        user_question (str): The question input by the user.
        questions (list[str]): List of possible questions to match against.
    Returns:
        str: The closest matching question if found, otherwise None.
    """
    matches = get_close_matches(user_question, questions, n=1, cutoff=0.6)
    return matches[0] if matches else None

def get_answer_for_question(question: str, knowledge_data: dict) -> str:
    """
    Retrieve the answer for a given question from the knowledge base.
    Args:
        question (str): The question for which an answer is needed.
        knowledge_data (dict): The knowledge base data.
    Returns:
        str: The answer to the question if found, otherwise None.
    """
    for item in knowledge_data.get("questions", []):
        if item.get("question") == question:
            return item.get("answer")
    return None

def load_unknown_questions() -> list:
    """
    Load unknown questions from a file.
    Returns:
        list: List of unknown questions.
    """
    return load_json(UNKNOWN_QUESTIONS_FILE).get("questions", [])

def save_unknown_questions(new_question: str):
    """
    Append a new question to the list of unknown questions and save to the file.
    Args:
        new_question (str): The new question to be added to the file.
    """
    unknown_questions = load_unknown_questions()
    unknown_questions.append({"question": new_question})
    save_json(UNKNOWN_QUESTIONS_FILE, {"questions": unknown_questions})

@app.route('/chat', methods=['POST'])
def chat():
    """
    Handle chat requests by processing user input and returning responses.
    Returns:
        Response: JSON response with the answer or a message for unknown questions.
    """
    try:
        # Extract the user's input from the request
        user_input = request.json.get('message')
        print(f"Received message: {user_input}")

        # Load knowledge base data
        knowledge_data = load_json(KNOWLEDGE_BASE_FILE)
        print("Loaded knowledge base data.")

        # Find the closest match for the user's input
        closest_match = find_closest_match(user_input, [item["question"] for item in knowledge_data.get("questions", [])])
        print(f"Closest match: {closest_match}")

        if closest_match:
            # Return the answer if a match is found
            answer = get_answer_for_question(closest_match, knowledge_data)
            print(f"Answer: {answer}")
            return jsonify({"answer": answer})
        else:
            # Save the unknown question if no match is found
            save_unknown_questions(user_input)
            print("Unknown question saved.")

            return jsonify({
                "answer": "I'm not sure about that right now. Your question has been noted and will be reviewed soon. Feel free to ask something else!"
            })
    except Exception as e:
        # Print the stack trace for debugging purposes
        traceback.print_exc()
        print(f"Error: {e}")
        return jsonify({"answer": "An error occurred."}), 500

@app.route('/')
def index():
    """
    Serve the HTML form for user input.
    Returns:
        Response: Rendered HTML page.
    """
    return render_template('index.html')

# Run the application in debug mode
if __name__ == '__main__':
    app.run(debug=True)