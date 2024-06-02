<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>World</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .edit-button {
            grid-column: span 4;
            justify-self: center;
        }

        .edit-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition-duration: 0.4s;
        }

        .edit-button:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        canvas {
            max-width: 500px;
            max-height: 500px;
        }

        .tab {
            display: none;
        }

        .tab.active {
            display: block;
        }

        .tab-buttons {
            margin-bottom: 10px;
        }

        .tab-buttons button {
            padding: 10px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
        }

        .tab-buttons button.active {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);"></div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#" onclick="openTab(event, 'home-tab')"><span class="fa fa-home mr-3"></span>Home</a>
                </li>
                <li>
                    <a href="#" onclick="openTab(event, 'reports-tab')"><i class="bx bxs-bar-chart-square mr-3"></i>Reports</a>
                </li>
                <li>
                    <a href="{{route('addcountry')}}"><i class="bx bx-plus-medical mr-3"></i>Add Country</a>
                </li>
                <li>
                    <a href="{{route('logout')}}"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div id="home-tab" class="tab active">
                <h2 class="mb-4">Welcome</h2>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Country Code</th>
                            <th>Country</th>
                            <th>Citys</th>
                            <th>Language</th>
                            <th>Population</th>
                            <th>Continent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                        <tr>
                            <td>{{$country->Code}}</td>
                            <td>{{$country->Name}}</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>{{$country->Population}}</td>
                            <td>{{$country->Continent}}</td>
                            <td class="action_container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCountryModal{{$country->Code}}">
                                    <i class="bx bxs-edit"></i>
                                </button>
                                <form action="{{ route('delete-country', ['code' => $country->Code]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action delete"><i class="bx bxs-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="reports-tab" class="tab">
                @include('reports')
            </div>
            @include('editcountry')
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script>
        function openTab(evt, tabName) {
            // Hide all tabs
            var tabs = document.getElementsByClassName("tab");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }

            // Remove 'active' class from all buttons
            var tabButtons = document.querySelectorAll(".list-unstyled.components a");
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }

            // Show the selected tab and mark its button as active
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
        });
    </script>
</body>
</html>
;]]