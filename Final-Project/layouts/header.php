<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <style>
        .row{ 
            width: 100%;
            
        }
        .dashboard-container {
        display: flex;
        min-height: 85.5vh;;
    }
    .dashboard-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease-in-out;
    }
        
        .row > .container-fluid{
            padding-top: 2%;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background:  #fdf6f0;
            margin: 0;
            padding: 0;

        }
        .container-fluid {
            margin-top:4%;
            width: 70%;
            margin-left: 5%;
            padding: 20px;
            transition: all 0.5s ease-in-out;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            background: #d9a79f;
            background: #d9a79f;
            color: white;
            padding: 20px;
        }
        .btn-primary{
            background:rgb(128, 96, 91);
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .btn {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            padding: 8px 16px;
            border: none;
            color: white;
        }
        .btn-warning {
       
            background: #c98b81;
        }
        .btn-success {
         
            background: #c98b81;
        }
        .btn-danger {
            background: #c98b81;
        }
        .btn:hover {
            transform: scale(1.05);
            filter: brightness(1.15);
            background: #c98b81;
            color:white;
        }
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .table thead th {
            background: #c98b81;
            color: white;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody tr {
            background: #fdf6f0;
            color: #5c3b36;
            transition: all 0.3s ease;
        }
        .table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table td, .table th {
            padding: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    