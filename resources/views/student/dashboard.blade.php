<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">Welcome to the Student Portal!</h3>
                <p class="mb-4">We are delighted to have you here. This portal is designed to help you navigate through your internship applications and keep track of your progress.</p>

                <h4 class="text-xl font-semibold mb-2">Resources</h4>
                <p class="mb-4">Make the most out of our resources:</p>
                <ul class="list-disc list-inside mb-4">
                    <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">Resume Writing Tips</button>
                    <button id="openCoverLetterModal" class="bg-green-500 text-white px-4 py-2 rounded ml-2">Cover Letter Guidelines</button>
                    <button id="openInterviewModal" class="bg-purple-500 text-white px-4 py-2 rounded ml-2">Interview Preparation Tips</button>
                </ul>

                <h4 class="text-xl font-semibold mb-2">Contact Us</h4>
                <p class="mb-4">If you have any questions or need assistance, feel free to <a href="{{ route('contact') }}" class="text-blue-500 underline">contact us</a>.</p>

                <p>We wish you the best of luck in your internship search!</p>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- Resume Writing Tips Modal -->
<div id="resumeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Resume Writing Tips</h3>
            <div class="mt-2 px-7 py-3 text-left">
                <h4 class="font-semibold">1. Tailor Your Resume to the Job</h4>
                <p class="text-sm text-gray-500">
                    Customize your resume for each job application. Highlight the skills and experiences that are most relevant to the job you are applying for. Use the job description to guide which keywords and phrases to include.
                </p>

                <h4 class="font-semibold mt-4">2. Use a Clean and Professional Format</h4>
                <p class="text-sm text-gray-500">
                    Keep your resume layout simple and easy to read. Use clear headings and bullet points to organize information. Avoid using flashy graphics or fonts that can make your resume hard to read.
                </p>

                <h4 class="font-semibold mt-4">3. Start with a Strong Summary Statement</h4>
                <p class="text-sm text-gray-500">
                    Begin your resume with a summary statement that briefly describes your professional background and key skills. This section should be concise and compelling to capture the employer’s interest.
                </p>

                <h4 class="font-semibold mt-4">4. Highlight Your Achievements</h4>
                <p class="text-sm text-gray-500">
                    Focus on your accomplishments rather than just listing your job duties. Use quantifiable metrics to demonstrate your impact, such as "Increased sales by 20%" or "Managed a team of 10 employees".
                </p>

                <h4 class="font-semibold mt-4">5. Use Action Verbs</h4>
                <p class="text-sm text-gray-500">
                    Start each bullet point with a strong action verb to make your experiences sound more dynamic. Examples include "Led", "Developed", "Managed", "Implemented", and "Improved".
                </p>

                <h4 class="font-semibold mt-4">6. Include Relevant Skills</h4>
                <p class="text-sm text-gray-500">
                    Add a skills section to your resume where you list relevant skills for the job. These can include both hard skills (like software proficiency) and soft skills (like communication and teamwork).
                </p>

                <h4 class="font-semibold mt-4">7. Keep it Concise</h4>
                <p class="text-sm text-gray-500">
                    Aim for a one-page resume if you have less than 10 years of experience. For more experienced professionals, a two-page resume is acceptable. Be sure to remove any unnecessary or outdated information.
                </p>

                <h4 class="font-semibold mt-4">8. Proofread Carefully</h4>
                <p class="text-sm text-gray-500">
                    Thoroughly check your resume for spelling and grammatical errors. Consider asking a friend or mentor to review it as well, as a fresh pair of eyes can catch mistakes you might have missed.
                </p>

                <h4 class="font-semibold mt-4">9. Use a Professional Email Address</h4>
                <p class="text-sm text-gray-500">
                    Ensure your contact information is up to date and includes a professional email address. Avoid using unprofessional or overly casual email addresses.
                </p>

                <h4 class="font-semibold mt-4">10. Update Your Resume Regularly</h4>
                <p class="text-sm text-gray-500">
                    Keep your resume updated with your latest experiences and skills. Regularly revising your resume ensures that you are always prepared to apply for new opportunities as they arise.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Cover Letter Modal -->
<div id="coverLetterModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Cover Letter Guidelines</h3>
            <div class="mt-2 px-7 py-3 text-left">
                <h4 class="font-semibold">1. Customize Each Cover Letter</h4>
                <p class="text-sm text-gray-500">
                    Tailor your cover letter for each job application. Mention the company and the position you're applying for and explain why you are a good fit for that specific role.
                </p>

                <h4 class="font-semibold mt-4">2. Use a Professional Format</h4>
                <p class="text-sm text-gray-500">
                    Use a professional layout with your contact information at the top, followed by the date, the employer’s contact information, and a formal salutation.
                </p>

                <h4 class="font-semibold mt-4">3. Start with a Strong Opening</h4>
                <p class="text-sm text-gray-500">
                    Begin with a compelling introduction that captures the reader's interest. Mention how you found the job posting and express your enthusiasm for the role.
                </p>

                <h4 class="font-semibold mt-4">4. Highlight Relevant Experiences</h4>
                <p class="text-sm text-gray-500">
                    Discuss your relevant experiences and skills in detail. Use specific examples to demonstrate how your background makes you a strong candidate for the position.
                </p>

                <h4 class="font-semibold mt-4">5. Show Your Enthusiasm</h4>
                <p class="text-sm text-gray-500">
                    Express your passion for the industry and the role. Employers are looking for candidates who are genuinely excited about the opportunity.
                </p>

                <h4 class="font-semibold mt-4">6. Keep it Concise</h4>
                <p class="text-sm text-gray-500">
                    Your cover letter should be no longer than one page. Be succinct and make sure every sentence adds value to your application.
                </p>

                <h4 class="font-semibold mt-4">7. Proofread Carefully</h4>
                <p class="text-sm text-gray-500">
                    Check your cover letter for spelling and grammar errors. Have someone else review it if possible, as they may catch mistakes you missed.
                </p>

                <h4 class="font-semibold mt-4">8. Use a Professional Tone</h4>
                <p class="text-sm text-gray-500">
                    Maintain a professional tone throughout your cover letter. Avoid slang or overly casual language.
                </p>

                <h4 class="font-semibold mt-4">9. End with a Strong Closing</h4>
                <p class="text-sm text-gray-500">
                    Close your cover letter by reiterating your interest in the role and the company. Thank the employer for their time and express your eagerness to discuss your application further.
                </p>

                <h4 class="font-semibold mt-4">10. Include a Call to Action</h4>
                <p class="text-sm text-gray-500">
                    Encourage the employer to contact you for an interview. Provide your contact information and mention your availability.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeCoverLetterModal" class="bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Interview Preparation Modal -->
<div id="interviewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Interview Preparation Tips</h3>
            <div class="mt-2 px-7 py-3 text-left">
                <h4 class="font-semibold">1. Research the Company</h4>
                <p class="text-sm text-gray-500">
                    Understand the company's mission, values, culture, and recent news. This knowledge will help you tailor your answers and show genuine interest.
                </p>

                <h4 class="font-semibold mt-4">2. Understand the Job Description</h4>
                <p class="text-sm text-gray-500">
                    Review the job description carefully. Be ready to discuss how your skills and experiences align with the responsibilities and qualifications listed.
                </p>

                <h4 class="font-semibold mt-4">3. Prepare Common Interview Questions</h4>
                <p class="text-sm text-gray-500">
                    Practice answers to common interview questions such as "Tell me about yourself," "What are your strengths and weaknesses?" and "Why do you want to work here?"
                </p>

                <h4 class="font-semibold mt-4">4. Use the STAR Method</h4>
                <p class="text-sm text-gray-500">
                    For behavioral questions, use the STAR method (Situation, Task, Action, Result) to structure your responses and provide clear, concise examples.
                </p>

                <h4 class="font-semibold mt-4">5. Dress Appropriately</h4>
                <p class="text-sm text-gray-500">
                    Choose professional attire that fits the company culture. When in doubt, it's better to be slightly overdressed than underdressed.
                </p>

                <h4 class="font-semibold mt-4">6. Bring Necessary Materials</h4>
                <p class="text-sm text-gray-500">
                    Bring extra copies of your resume, a list of references, and a notebook for taking notes. Having these materials on hand can help you feel prepared.
                </p>

                <h4 class="font-semibold mt-4">7. Prepare Questions to Ask</h4>
                <p class="text-sm text-gray-500">
                    Prepare thoughtful questions to ask the interviewer about the role, team dynamics, and company culture. This demonstrates your interest and engagement.
                </p>

                <h4 class="font-semibold mt-4">8. Practice Good Body Language</h4>
                <p class="text-sm text-gray-500">
                    Maintain eye contact, offer a firm handshake, and sit up straight. Positive body language can convey confidence and enthusiasm.
                </p>

                <h4 class="font-semibold mt-4">9. Follow Up After the Interview</h4>
                <p class="text-sm text-gray-500">
                    Send a thank-you email within 24 hours of your interview, expressing appreciation for the opportunity and reiterating your interest in the position.
                </p>

                <h4 class="font-semibold mt-4">10. Stay Calm and Be Yourself</h4>
                <p class="text-sm text-gray-500">
                    Remember that the interview is as much about you assessing the company as it is about them assessing you. Stay calm, be yourself, and let your personality shine.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeInterviewModal" class="bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('resumeModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('resumeModal').classList.add('hidden');
    });

    document.getElementById('openCoverLetterModal').addEventListener('click', function() {
        document.getElementById('coverLetterModal').classList.remove('hidden');
    });

    document.getElementById('closeCoverLetterModal').addEventListener('click', function() {
        document.getElementById('coverLetterModal').classList.add('hidden');
    });

    document.getElementById('openInterviewModal').addEventListener('click', function() {
        document.getElementById('interviewModal').classList.remove('hidden');
    });

    document.getElementById('closeInterviewModal').addEventListener('click', function() {
        document.getElementById('interviewModal').classList.add('hidden');
    });
</script>
