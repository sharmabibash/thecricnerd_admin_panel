<?php
// $base_url = $_SERVER['DOCUMENT_ROOT'] . "/";
$base_url = $_SERVER['DOCUMENT_ROOT'] . "/The Cricket Nerd Admin/";
include $base_url . 'Assets/Components/Navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Quiz Question Upload Form</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  
    <div class="max-w-screen-xl mx-auto px-4 flex justify-between items-center mt-10">
    </div>
  <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 md:p-10 mx-auto mt-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Upload Quiz Question</h2>
    
    <form id="uploadForm" method="POST" enctype="multipart/form-data">
      <div class="mb-6">
        <label for="question" class="block text-sm font-medium text-gray-700 mb-2">Question</label>
        <textarea id="question" name="question" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Enter your question here"></textarea>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
          <label for="option1" class="block text-sm font-medium text-gray-700 mb-2">Option 1</label>
          <input type="text" id="option1" name="option1" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Option 1">
        </div>
        <div>
          <label for="option2" class="block text-sm font-medium text-gray-700 mb-2">Option 2</label>
          <input type="text" id="option2" name="option2" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Option 2">
        </div>
        <div>
          <label for="option3" class="block text-sm font-medium text-gray-700 mb-2">Option 3</label>
          <input type="text" id="option3" name="option3" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Option 3">
        </div>
        <div>
          <label for="option4" class="block text-sm font-medium text-gray-700 mb-2">Option 4</label>
          <input type="text" id="option4" name="option4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Option 4">
        </div>
      </div>
      <div class="mb-6">
        <label for="correctOption" class="block text-sm font-medium text-gray-700 mb-2">Correct Option</label>
        <select id="correctOption" name="correctOption" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <option value="" disabled selected>Select the correct option</option>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
          <option value="4">Option 4</option>
        </select>
      </div>
      <div class="text-center">
        <button type="submit" class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Upload Question
        </button>
      </div>
    </form>
  </div>
  <script src="Assets/JS/quiz_questions.js" type="module"></script>
</body>
</html>
