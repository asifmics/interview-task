import {handleSubmission , handleDeletion} from '../crud.js'

$(document).ready(function () {
    // AJAX request to load city data
    $.ajax({
        url: "city/list", // Adjust the route if needed
        type: 'GET',
        success: function (response) {
            let tableBody = $('#cityTableBody');
            tableBody.empty(); // Clear any existing rows

            // Loop through each city and create a table row
            response.forEach(function (city, index) {
                let row = `
                        <tr class="table_row">
                            <td style="width: 10%"><span class="order_id">${index + 1}</span></td>
                            <td style="width: 30%"><span class="table_price">${city.name}</span></td>
                            <td style="width: 20%"><span class="table_price">${city.state.name}</span></td>
                            <td style="width: 40%">
                                <div class="action__icon d-flex">
                                    <div class="action__icon__item">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown">
                                                <i class="material-symbols-outlined">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="single-item">
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="edit(${city.id}, '${city.name}',${city.state_id})">
                                                        <i class="material-symbols-outlined">edit</i> Edit City
                                                    </a>
                                                </li>
                                                <li class="single-item">
                                                    <a class="dropdown-item delete delete_item city_delete_item" href="javascript:void(0)" data-id="${city.id}">
                                                        <i class="material-symbols-outlined">delete</i> Delete City
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
            console.error('Error fetching cities:', xhr.responseText);
        }
    });

    // AJAX request to city create
    $(".city_create_btn").click(function (e) {
        e.preventDefault();

        let data = {
            name: $("#name").val(),
            state_id: $("#state_id").val()
        }

        handleSubmission("cities", data , 'City created successfully.')

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    // AJAX request to city update
    $("#city-edit-btn").click(function (e) {
        e.preventDefault();

        let data = {
            id: $("#editCityId").val(),
            name: $("#cityEditName").val(),
            state_id: $("#edit_state_id").val(),
        }
        console.log(data)

        handleSubmission("cities/" + data.id, data, 'City updated successfully', "PATCH")

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    // AJAX request to city deleted
    $(document).on('click', '.city_delete_item', function(event) {
        event.preventDefault();
        handleDeletion("cities/"+ $(this).data('id'))
    });
});
