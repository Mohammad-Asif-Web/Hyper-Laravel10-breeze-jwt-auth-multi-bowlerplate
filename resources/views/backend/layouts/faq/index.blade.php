
@extends('backend.app')

@section('title')
    Category List | Course
@endsection

@push('css')
<style>

</style>
@endpush

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">FAQ List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">FAQ</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding: 0 24px; padding-bottom: 24px;">
                        {{-- <h4 class="header-title mb-3" style="background-color: #536de6;"><i class="mdi mdi-account-circle font-18 align-middle me-1"></i>General Setting</h4> --}}
                        <ul class="nav form-wizard-header mb-4 d-flex justify-content-between align-items-center" style="background-color: #536de6;">
                            <a class="nav-link rounded-0 py-2 active" style="color: #fff">
                                <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                <span class="d-none d-sm-inline">FAQ List</span>
                            </a>
                            {{-- BULK DELETE CLASS:: delete-selected-toolbar --}}
                            <div class="d-flex align-items-center gap-0 me-2 d-none"
                                id="delete-selected-toolbar">
                                <div class="fw-bold me-5" style="color: #ffffff;font-size:16px;font-style:normal;font-weight:500 !important;">
                                    {{-- BULK DELETE ID:: selected-count --}}
                                    <span class="me-2" id="selected-count"></span>
                                    Selected
                                </div>
                                    {{-- BULK DELETE ID:: delete-selected --}}
                                <button type="button" id="delete-selected" class="table-data-content status-canceled"
                                        style="border:0;padding: 8px 16px;background: #ff6f6f;color: #fff;">
                                    Delete Selected
                                </button>
                            </div>
                            {{-- Search --}}
                            <form action="{{route('admin.faq.search')}}" method="GET" class="me-2" id="right-menu-action-bar">
                                <input type="text" class="outline-0" placeholder="Search category"
                                        name="search" style="outline: none; padding: 6px 14px;" value="{{ request('search') }}" />
                            </form>
                        </ul>

                        {{-- write table below --}}
                        <table class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="delete-multiple-form" action="{{route('admin.faq.bulk-delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td><input type="checkbox" class="user-checkbox"
                                                name="faq_ids[]" value="{{ $faq->id }}" >
                                            </td>
                                            <td>{{ ucfirst(Str::limit($faq->question, 40)) }} </td>
                                            <td>{{ ucfirst(Str::limit($faq->answer, 40)) }} </td>
                                            <td>
                                                <a href="javascript:void(0);" data-id="{{ $faq->id }}"
                                                    class="toggle-status-btn"
                                                    style="background: {{ $faq->status == 'Active' ? '#64e775' : '#333' }} !important;
                                                    padding:3px 10px;font-size:14px;border-radius:15px;color:#fff;">
                                                {{ ucwords($faq->status )  }}
                                                </a>
                                            </td>
                                            <td>{{ $faq->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if ($faq->created_at == $faq->updated_at)
                                                    Not Updated
                                                @else
                                                {{ $faq->updated_at->diffForHumans() }}

                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-id="{{$faq->id}}" class="d-block">
                                                    <span style="font-size:20px;">
                                                        <i class="uil-edit"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center fw-bold fs-4">No Record found</td>
                                        </tr>
                                    @endforelse
                                </form>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $faqs->links() }}
                            {{-- {{ $faqs->appends(['search' => request('search')])->links() }} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- update modal --}}
<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faqModalLabel">Update FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateFaqForm" data-id="">
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <input type="text" class="form-control" id="answer" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- update modal end --}}


@endsection

@push('script')
{{-- change the status of faq --}}
<script>
    $(document).ready(function() {
        $('.toggle-status-btn').on('click', function() {
            var button = $(this);
            var faqId = button.data('id');

            $.ajax({
                url: "{{ route('admin.faq.toggle-status', '') }}/" + faqId,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    button.text(response.status);
                    button.css('background', response.status === 'Active' ? '#64e775' : '#333');
                    toastr.success(response.success);
                },
                error: function(xhr) {
                    toastr.error("Status update failed:", xhr.responseText);
                }
            });
        });
    });
</script>

{{-- update category name --}}
<script>
    $(document).ready(function () {
    // Open modal and fetch category data
    $('.uil-edit').on('click', function () {
        const faqId = $(this).closest('a').data('id');
        // Fetch the category details
        $.ajax({
            url: `/admin/faq/edit/${faqId}`,
            type: 'GET',
            success: function (data) {
                $('#faqModal').modal('show'); // Show the modal
                $('#question').val(data.question); // Fill the modal input
                $('#answer').val(data.answer); // Fill the modal input
                $('#updateFaqForm').attr('data-id', data.id); // Set category ID for form
            },
            error: function () {
                let message = 'Failed to fetch category data. Please try again.';
                toastr.error(message);
            },
        });
    });

    // Update category
    $('#updateFaqForm').on('submit', function (e) {
        e.preventDefault();
        const faqId = $(this).data('id');
        const question = $('#question').val();
        const answer = $('#answer').val();

        $.ajax({
            url: `/admin/faq/update/${faqId}`,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                question: question, // Match the field name in the controller
                answer: answer, // Match the field name in the controller
            },
            success: function (response) {
                if (response.status === true) {
                    // Close modal and show success toast
                    $('#faqModal').modal('hide');
                    toastr.success(response.message);
                    location.reload(); // Reload the page to reflect changes
                } else {
                    // Handle unexpected failure
                    toastr.error(response.message || 'Unexpected error occurred.');
                }
            },
            error: function (xhr) {
                // Handle validation errors
                if (xhr.status === 422) {
                    const response = xhr.responseJSON;
                    toastr.error(response.message || 'Validation failed. Please check your input.');
                } else {
                    // Handle other errors
                    toastr.error('Failed to update Faq. Please try again.');
                }
            },
        });
    });

});

</script>


{{-- bulk delete the faqs --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all');
        const userCheckboxes = document.querySelectorAll('input[name="faq_ids[]"]');
        const deleteSelectedToolbar = document.getElementById('delete-selected-toolbar');
        const rightMenuActionBar = document.getElementById('right-menu-action-bar'); // Get right menu action bar
        const deleteSelectedButton = document.getElementById('delete-selected');
        const selectedCount = document.getElementById('selected-count');
        const deleteForm = document.getElementById('delete-multiple-form');

        // Toggle select all checkboxes
        selectAllCheckbox.addEventListener('change', function () {
            userCheckboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateSelectedCount();
        });

        // Update the selected count and show/hide toolbars
        userCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', updateSelectedCount);
        });

        function updateSelectedCount() {
            const checkedCheckboxes = document.querySelectorAll('input[name="faq_ids[]"]:checked');
            const count = checkedCheckboxes.length;
            selectedCount.innerText = count;
            deleteSelectedToolbar.classList.toggle('d-none', count === 0);

            // Toggle visibility of right menu action bar
            rightMenuActionBar.style.display = count === 0 ? 'flex' : 'none'; // Display block if no items are selected
        }

        deleteSelectedButton.addEventListener('click', function (event) {
            event.preventDefault();
            const checkedCheckboxes = document.querySelectorAll('input[name="faq_ids[]"]:checked');

            if (checkedCheckboxes.length === 0) {
                Swal.fire({
                    title: 'No Selection',
                    text: 'Please select at least one order to delete.',
                    icon: 'warning',
                    confirmButtonText: 'Okay'
                });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: 'No, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    });
    </script>

@endpush

