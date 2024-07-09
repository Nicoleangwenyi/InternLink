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
                <form action="{{ route('internships.store') }}" method="POST">
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
            </div>
        </div>
    </div>
</x-app-layout>
