import {handleDeletion, handleSubmission} from "../crud.js";

$(document).ready(function () {
    $.ajax({
        url: "country/list", // Adjust the route if needed
        type: 'GET',
        success: function (response) {
            let tableBody = $('#countryTableBody');
            tableBody.empty(); // Clear any existing rows

            // Loop through each country and create a table row
            response.forEach(function (country, index) {
                let row = `
                        <tr class="table_row">
                            <td style="width: 10%"><span class="order_id">${index + 1}</span></td>
                            <td style="width: 50%"><span class="table_price">${country.name}</span></td>
                            <td style="width: 40%">
                                <div class="action__icon d-flex">
                                    <div class="action__icon__item">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown">
                                                <i class="material-symbols-outlined">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="single-item">
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="edit(${country.id}, '${country.name}')">
                                                        <i class="material-symbols-outlined">edit</i> Edit Country
                                                    </a>
                                                </li>
                                                <li class="single-item">
                                                    <a class="dropdown-item delete delete_item" href="javascript:void(0)" data-id="${country.id}">
                                                        <i class="material-symbols-outlined">delete</i> Delete Country
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
            console.error('Error fetching countries:', xhr.responseText);
        }
    });

    $(".cmn_btn").click(function (e) {
        e.preventDefault();

        let data = {
            name: $("#name").val(),
        }

        handleSubmission("countries", data,'Country created successfully',)

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    $("#country-edit-btn").click(function (e) {
        e.preventDefault();

        let data = {
            name: $("#editName").val(),
            countryId: $("#editCountryId").val(),
        }

        handleSubmission("countries/" + data.countryId, data, 'Country updated successfully', "PATCH")

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });

    $(document).on('click', '.delete_item', function(event) {
        event.preventDefault();
        handleDeletion("countries/"+ $(this).data('id'))
    });
});
