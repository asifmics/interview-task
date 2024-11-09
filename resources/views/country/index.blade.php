<x-app-layout>
    <div class="p-4" style="width:100% !important;">
        <div class="dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="dashboard__card__header__title">Country lists</h5>
                <button type="button" class="btn btn-primary" id="openModalBtn">Add Country</button>
            </div>


            <div class="dashboard__card__inner border_top_1">
                <div class="dashboard__inventory__table custom_table">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 50%">Country name</th>
                            <th style="width: 40%">Actions</th>
                        </tr>
                        </thead>


                        <tbody id="countryTableBody">
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
                    <h5 class="modal-title" id="exampleModalLabel">Country create</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">Country Name</label>
                            <input type="text" id="name" name="name" class="form__control radius-5"
                                   placeholder="Enter here country Name...">
                            <div style="margin-top: 2px">
                                <span id="name-error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary cmn_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Country update</h5>
                </div>
                <form action="#" class="custom_form">
                    <div class="modal-body">
                        <div class="form__input__single">
                            <label for="name5" class="form__input__single__label">Country Name</label>
                            <input name="id" hidden id="editCountryId" value="">
                            <input type="text" id="editName" name="name" class="form__control radius-5"
                                   placeholder="Enter here country Name...">
                            <div style="margin-top: 2px">
                                <span id="name-errors" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="country-edit-btn">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $('#openModalBtn').click(function () {
                $('#myModal').modal('show');
            });

            $('.closeModal').click(function () {
                $('#myModal').modal('hide'); // Close the modal
                $('#editModal').modal('hide'); // Close the modal
            });

            function edit(id,name) {
                $('#editModal').modal('show');
                $('#editName').val(name)
                $('#editCountryId').val(id)
            }
        </script>
    @endpush
</x-app-layout>






