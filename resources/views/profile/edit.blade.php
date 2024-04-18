<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg d-flex justify-content-between">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="user-profile px-5">
                    <div class="img position-relative  mx-auto" style="width:150px;height:150px;">
                        <img src={{ asset('assets/' . Auth::user()->image->image) }} alt="user"
                            class="rounded-circle" style="width:100%;height:100%">
                        <form action="{{ route('image.update', Auth::user()->image) }}" method="POST"
                            id="change-image-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <i class="fa-solid fa-camera position-absolute bottom-0 end-0 p-2 fs-5 text-secondary border rounded-circle text-bg-light"
                                role="button" id="change-icon"></i>
                            <input type="file" name="image" accept="image/jpg,image/jpeg,image/png"
                                id="image-file-input" hidden>
                        </form>
                    </div>
                    <x-input-error id="image-error" style="width:150px" class="mt-3 mx-auto text-center"
                        messages="file is not an image of type jpg,png,jpeg" />
                    @session('message')
                        <div class="alert alert-success mt-3">{{ session('message') }}</div>
                    @endsession
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $("document").ready(function() {
        $("#image-error").hide();
        $("#change-icon").click(function() {
            $("#image-file-input").click();
        });

        $("#image-file-input").change(function() {
            const file = $(this)[0].files[0];
            const type = file.type.toLowerCase();
            const allowedImageTypes = ["image/jpg", "image/png", "image/jpeg"];
            if (!allowedImageTypes.includes(type)) {
                $("#image-error").show();
                return;
            }

            $("#change-image-form").submit();

        });
    });
</script>
