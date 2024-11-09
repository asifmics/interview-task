import {handleSubmission , handleDeletion} from '../crud.js'

$(document).ready(function () {
    // AJAX request to load state data
    $.ajax({
        url: "state/list", // Adjust the route if needed
        type: 'GET',
        success: function (response) {
            let tableBody = $('#stateTableBody');
            tableBody.empty(); // Clear any existing rows

            // Loop through each country and create a table row
            response.forEach(function (state, index) {
                let row = `
                        <tr class="table_row">
                            <td style="width: 10%"><span class="order_id">${index + 1}</span></td>
                            <td style="width: 30%"><span class="table_price">${state.name}</span></td>
                            <td style="width: 20%"><span class="table_price">${state.country.name}</span></td>
                            <td style="width: 40%">
                                <div class="action__icon d-flex">
                                    <div class="action__icon__item">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown">
                                                <i class="material-symbols-outlined">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="single-item">
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="edit(${state.id}, '${state.name}',${state.country_id})">
                                                        <i class="material-symbols-outlined">edit</i> Edit State
                                                    </a>
                                                </li>
                                                <li class="single-item">
                                                    <a class="dropdown-item delete delete_item state_delete_item" href="javascript:void(0)" data-id="${state.id}">
                                                        <i class="material-symbols-outlined">delete</i> Delete State
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                tableBody.append(row);
            });
        },
        error: function (xhr) {
            console.error('Error fetching states:', xhr.responseText);
        }
    });

    // AJAX request to state create
    $(".state_create_btn").click(function (e) {
        e.preventDefault();

        let data = {
            name: $("#name").val(),
            country_id: $("#country_id").val()
        }

        handleSubmission("states", data,'State created successfully.')

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    // AJAX request to state update
    $("#state-edit-btn").click(function (e) {
        e.preventDefault();

        let data = {
            id: $("#editStateId").val(),
            name: $("#stateEditName").val(),
            country_id: $("#edit_country_id").val(),
        }

        handleSubmission("states/" + data.id, data, 'State updated successfully', "PATCH")

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    // AJAX request to state deleted
    $(document).on('click', '.state_delete_item', function(event) {
        event.preventDefault();
        handleDeletion("states/"+ $(this).data('id'))
    });
});
