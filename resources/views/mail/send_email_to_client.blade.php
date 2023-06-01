<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilos adicionais para a tabela */
        table {
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        th, td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <!-- Bootstrap embutido -->
    <style>
        /* Estilos do Bootstrap */

        /* Container responsivo */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* Responsividade da tabela horizontal */
        .table-responsive {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        /* Alinhamento centralizado das células da tabela */
        .table td, .table th {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Código do Pedido</th>
                        <td>{{ $data['id'] }}</td>
                    </tr>
                    <tr>
                        <th>Código do Cliente</th>
                        <td>{{ $data['client_code'] }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $data['client']['name'] }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data['client']['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Celular</th>
                        <td>{{ $data['client']['phone'] }}</td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
