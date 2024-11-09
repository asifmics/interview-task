<x-app-layout>
    <div class="p-4" style="width:100% !important;">
        <div class="dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="dashboard__card__header__title">City lists</h5>
                <button type="button" class="btn btn-primary" id="openModalBtn">Add City</button>
            </div>


            <div class="dashboard__card__inner border_top_1">
                <div class="dashboard__inventory__table custom_table">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 30%">City name</th>
                            <th style="width: 20%">State name</th>
                            <th style="width: 40%">Actions</th>
                        </tr>
                        </thead>

                        <tbody id="cityTableBody">
                        <!-- Rows will be injected here by AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">City create</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">City Name</label>
                            <input type="text" id="name" name="name" class="form__control radius-5"
                                   placeholder="Enter here city Name...">
                            <div style="margin-top: 2px">
                                <span id="name-error" style="color: red"></span>
                            </div>
                        </div>

                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">State Name</label>
                            <select id="state_id" name="state_id" class="radius-5 js-example-basic-single">
                                <option value=""></option>
                            </select>
                            <div style="margin-top: 2px">
                                <span id="state_id-error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary city_create_btn" id="saveChangesBtn">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">City update</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">City Name</label>
                            <input name="id" hidden id="editCityId" value="">
                            <input type="text" id="cityEditName" name="name" class="form__control radius-5"
                                   placeholder="Enter here city Name...">
                            <div style="margin-top: 2px">
                                <span id="name-error" style="color: red"></span>
                            </div>
                        </div>

                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">State Name</label>
                            <select id="edit_state_id" name="state_id" class="form__control radius-5">
                                <option value="">Select a state</option>
                            </select>
                            <div style="margin-top: 2px">
                                <span id="state_id-error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="city-edit-btn">Update
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>


<script type="text/javascript">

    // AJAX request to load country data
    $.ajax({
        url: "state/list",
        type: "GET",
        success: function (states) {
            $.each(states, function (index, state) {
                $('#state_id').append(new Option(state.name, state.id));
            });
        }
    });

    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            placeholder: 'Select a state',
            allowClear: true
        });

        $('#openModalBtn').click(function () {
            $('#myModal').modal('show');
        });

        $('.closeModal').click(function () {
            $('#myModal').modal('hide'); // Close the modal
            $('#editModal').modal('hide'); // Close the modal
            $('#name').val('');
            $('#state_id').value('');
        });
    });

    // AJAX request to city edit
    $.ajax({
        url: "state/list",
        type: "GET",
        success: function (states) {
            $.each(states, function (index, state) {
                $('#edit_state_id').append(new Option(state.name, state.id));
            });
        }
    });

    function edit(id, name, state_id) {
        $('#edit_state_id').val(state_id)
        $('#editModal').modal('show');
        $('#cityEditName').val(name)
        $('#editCityId').val(id)
    }

</script>
