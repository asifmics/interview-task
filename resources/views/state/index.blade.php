<x-app-layout>
    <div class="p-4" style="width:100% !important;">
        <div class="dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="dashboard__card__header__title">State lists</h5>
                <button type="button" class="btn btn-primary" id="openModalBtn">Add State</button>
            </div>


            <div class="dashboard__card__inner border_top_1">
                <div class="dashboard__inventory__table custom_table">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 30%">State name</th>
                            <th style="width: 20%">Country name</th>
                            <th style="width: 40%">Actions</th>
                        </tr>
                        </thead>

                        <tbody id="stateTableBody">
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
                    <h5 class="modal-title" id="exampleModalLabel">State create</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">State Name</label>
                            <input type="text" id="name" name="name" class="form__control radius-5"
                                   placeholder="Enter here state Name...">
                            <div style="margin-top: 2px">
                                <span id="name-error" style="color: red"></span>
                            </div>
                        </div>

                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">Country Name</label>
                            <select id="country_id" name="country_id" class="radius-5 js-example-basic-single">
                                <option value=""></option>
                            </select>
                            <div style="margin-top: 2px">
                                <span id="country_id-error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary state_create_btn" id="saveChangesBtn">Save
                            changes
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
                    <h5 class="modal-title" id="editModalLabel">State update</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">State Name</label>
                            <input name="id" hidden id="editStateId" value="">
                            <input type="text" id="stateEditName" name="name" class="form__control radius-5"
                                   placeholder="Enter here state Name...">
                            <div style="margin-top: 2px">
                                <span id="name-error" style="color: red"></span>
                            </div>
                        </div>

                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">Country Name</label>
                            <select id="edit_country_id" name="country_id" class="form__control radius-5">
                                <option value="">Select a country</option>
                            </select>
                            <div style="margin-top: 2px">
                                <span id="country_id-error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="state-edit-btn">Update
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>


<script type="text/javascript">

    function getCountriesList(idName) {
        $.ajax({
            url: "country/list",
            type: "GET",
            success: function (countries) {
                $.each(countries, function (index, country) {
                    $('#' + idName).append(new Option(country.name, country.id));
                });
            }
        });
    }

    $('.js-example-basic-single').select2({
        placeholder: 'Select a country',
        allowClear: true,
    });

    $('#openModalBtn').click(function () {
        $('#myModal').modal('show');
        getCountriesList('country_id')
    });

    $('.closeModal').click(function () {
        $('#myModal').modal('hide'); // Close the modal
        $('#editModal').modal('hide');
        $('#name').val('');
        $('#country_id').value('');
    });

    // AJAX request to state edit
    $.ajax({
        url: "country/list",
        type: "GET",
        success: function (countries) {
            $.each(countries, function (index, country) {
                $('#edit_country_id').append(new Option(country.name, country.id));
            });
        }
    });

    function edit(id, name, country_id) {
        $('#edit_country_id').val(country_id)
        $('#editModal').modal('show');
        $('#stateEditName').val(name)
        $('#editStateId').val(id)
    }

</script>
