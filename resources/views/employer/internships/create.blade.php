<x-app-layout>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="bg-white shadow-sm sm:rounded-lg p-3">
                <div class="pb-2 border-b border-gray-200 mb-3">
                    <h4 class="text-lg font-bold text-gray-800">Create Internship
                        <a href="{{ route('internships.index') }}" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 float-right">Back</a>
                    </h4>
                </div>
                <form action="{{ route('internships.store') }}" method="POST" id="internshipsform">
                    @csrf

                    <input type="hidden" name="company_id" value="{{ $userId }}" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-gray-700 text-sm">Position</label>
                            <input type="text" name="title" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Location</label>
                            <input type="text" name="location" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Start Date</label>
                            <input type="date" name="start_date" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('start_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">End Date</label>
                            <input type="date" name="end_date" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('end_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Description</label>
                            <textarea name="description" rows="2" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Requirements</label>
                            <textarea name="requirements" rows="2" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs"></textarea>
                            @error('requirements') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Application Deadline</label>
                            <input type="date" name="application_deadline" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('application_deadline') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Stipend/Salary</label>
                            <input type="text" name="stipend_salary" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('stipend_salary') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Contact Information</label>
                            <input type="text" name="contact_information" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('contact_information') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Company Overview</label>
                            <textarea name="company_overview" rows="2" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs"></textarea>
                            @error('company_overview') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Benefits</label>
                            <textarea name="benefits" rows="2" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs"></textarea>
                            @error('benefits') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Working Hours</label>
                            <input type="text" name="working_hours" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs" />
                            @error('working_hours') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm">Eligibility Criteria</label>
                            <textarea name="eligibility_criteria" rows="2" class="form-input mt-1 block w-full border-gray-300 rounded-md p-1 text-xs"></textarea>
                            @error('eligibility_criteria') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 text-s">Save</button>
                    </div>
                </form>

                <script>
                    document.getElementById('internshipsform').addEventListener('submit', function(event) {
                        const startDateInput = document.querySelector('input[name="start_date"]');
                        const endDateInput = document.querySelector('input[name="end_date"]');
                        const deadlineDateInput = document.querySelector('input[name="application_deadline"]');

                        const startDate = new Date(startDateInput.value);
                        const endDate = new Date(endDateInput.value);
                        const deadlineDate = new Date(deadlineDateInput.value);
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);

                        const tenDaysFromToday = new Date();
                        tenDaysFromToday.setDate(today.getDate() + 10);

                        const oneMonthFromStartDate = new Date(startDate);
                        oneMonthFromStartDate.setMonth(startDate.getMonth() + 1);

                        const deadl = new Date();
                        deadl.setDate(startDate.getDate()-3);

                        let isValid = true;

                        // Reset previous error states
                        startDateInput.classList.remove('border-red-500');
                        endDateInput.classList.remove('border-red-500');
                        deadlineDateInput.classList.remove('border-red-500');

                        if (startDate < tenDaysFromToday) {
                            isValid = false;
                            startDateInput.classList.add('border-red-500');
                            alert('Start date must be at least ten days from today.');
                        }

                        if (endDate < oneMonthFromStartDate) {
                            isValid = false;
                            endDateInput.classList.add('border-red-500');
                            alert('End date must be at least one month from the start date.');
                        }

                        if (deadlineDate.getDate() === today.getDate()) {
                            isValid = false;
                            deadlineDateInput.classList.add('border-red-500');
                           // alert(deadl);
                            alert('Deadline date cannot be the same as today.');
                        }

                        if(deadlineDate.getDate()>deadl.getDate())
                        {
                            isValid = false;
                            deadlineDateInput.classList.add('border-red-500');
                            alert('Deadline for Application submission should be ateast 3 days before the start date .');
                        }

                        if (!isValid) {
                            event.preventDefault();
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
