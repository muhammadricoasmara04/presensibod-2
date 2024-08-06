@extends('dashboard.layout.main')
@section('container')
    <style>
        .table_component {
            overflow: auto;
            width: 100%;
        }

        .table_component table {
            border: 1px solid #dededf;
            height: 100%;
            width: 100%;
            table-layout: auto;
            border-collapse: collapse;
            border-spacing: 1px;
            text-align: left;
        }

        .table_component caption {
            caption-side: top;
            text-align: left;
        }

        .table_component th {
            border: 1px solid #dededf;
            background-color: #eceff1;
            color: #000000;
            padding: 5px;
        }

        .table_component td {
            border: 1px solid #dededf;
            background-color: #ffffff;
            color: #000000;
            padding: 5px;
        }
    </style>
    <div class="table_component" role="region" tabindex="0">
        <table>
            <caption>Table 1</caption>
            <thead>
                <tr>
                    <th>Nama </th>
                    <th>Tanggal</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Header 5</th>
                    <th>Header 6</th>
                    <th>Header 7</th>
                    <th>Header 8</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
