@extends('layouts.admin')

@section('title')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold ">Blogs</h4>
        <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Extended UI /</span> Text Divider</h6>
        <div class="card">
            <h5 class="card-header">Blogs</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>1</td>
                            <td>Albert Cook</td>
                            <td>
                                <ul
                                    class="list-unstyled users-list justify-content-center m-0 avatar-group d-flex align-items-center">
                                    <li class="avatar avatar-xl pull-up ">
                                        <img src="../assets/img/avatars/5.png" alt="Avatar">
                                    </li>
                                </ul>
                            </td>
                            <td>12/12/2021</td>
                            <td>
                                <div class="form-check form-switch mb-2 d-flex align-items-center justify-content-center"
                                    style="transform: scale(1.2);">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                        onchange="toggleSwitch(this)">
                                    <span id="switchText" class="ms-2">Off</span>
                                </div>
                            </td>

                            <script>
                                function toggleSwitch(checkbox) {
                                    var switchText = document.getElementById("switchText");
                                    if (checkbox.checked) {
                                        switchText.textContent = "On";
                                    } else {
                                        switchText.textContent = "Off";
                                    }
                                }
                            </script>

                            <td class="text-center">
                                <div class="d-flex justify-content-center  gap-2">
                                    <a href="gallery-page.html" class="btn btn-primary" role="button"
                                        data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="" data-bs-original-title="Gallery">
                                        <i class="bx bx-photo-album me-1"></i>
                                    </a>
                                    <a href="edit-page.html" class="btn btn-primary" role="button" data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up"
                                        title="" data-bs-original-title="Edit">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <a href="delete-page.html" class="btn btn-danger" role="button"
                                        data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="" data-bs-original-title="Delete">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>
                                </div>
                            </td>



                        </tr>
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>1</td>
                            <td>Albert Cook</td>
                            <td>
                                <ul
                                    class="list-unstyled users-list justify-content-center m-0 avatar-group d-flex align-items-center">
                                    <li class="avatar avatar-xl pull-up ">
                                        <img src="../assets/img/avatars/5.png" alt="Avatar">
                                    </li>
                                </ul>
                            </td>
                            <td>12/12/2021</td>
                            <td>
                                <div class="form-check form-switch mb-2 d-flex align-items-center justify-content-center"
                                    style="transform: scale(1.2);">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                        onchange="toggleSwitch(this)">
                                    <span id="switchText" class="ms-2">Off</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center  gap-2">
                                    <a href="gallery-page.html" class="btn btn-primary" role="button"
                                        data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="" data-bs-original-title="Gallery">
                                        <i class="bx bx-photo-album me-1"></i>
                                    </a>
                                    <a href="edit-page.html" class="btn btn-primary" role="button" data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up"
                                        title="" data-bs-original-title="Edit">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <a href="delete-page.html" class="btn btn-danger" role="button"
                                        data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="" data-bs-original-title="Delete">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>
                                </div>
                            </td>



                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('js')
    function toggleSwitch(checkbox) {
        var switchText = document.getElementById("switchText");
        if (checkbox.checked) {
            switchText.textContent = "On";
        } else {
            switchText.textContent = "Off";
        }
    }
@endsection
