<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold mb-4 text-center">RecruitManagement</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Application Submission Portal</h2>
                <form action="submit_application.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="resume" class="block text-sm font-medium text-gray-700">Upload Resume</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Submit Application</button>
                        <h1 class="text-3xl font-bold mb-4 text-center">RecruitManagement</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Applicant Management</h2>
                <form action="submit_application.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Profile Builder</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Qualification Analyzer</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="resume" class="block text-sm font-medium text-gray-700">Nlp interview Scheduler</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="resume" class="block text-sm font-medium text-gray-700">Calendar/Scheduler Manager</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="resume" class="block text-sm font-medium text-gray-700">Status Tracker</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="resume" class="block text-sm font-medium text-gray-700">Communication Module</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Submit Application</button>
                    </div>
                </form>
</html>