<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>�۾��� ��</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

    <!-- �۾��� �� -->
    <div class="container write-form-container">
        <h2>�۾���</h2>
        <form>
            <table class="table table-bordered table-form">
                <tbody>
                    <tr>
                        <th>�ۼ���</th>
                        <td>
                            <input type="text" class="form-control" id="author" placeholder="�ۼ��� �̸�">
                        </td>
                    </tr>
                    <tr>
                        <th>����</th>
                        <td>
                            <input type="text" class="form-control" id="title" placeholder="�� ����">
                        </td>
                    </tr>
                    <tr>
                        <th>�̸���</th>
                        <td>
                            <input type="email" class="form-control" id="email" placeholder="�̸��� �ּ�">
                        </td>
                    </tr>
                    <tr>
                        <th>÷������</th>
                        <td>
                            <input type="file" class="form-control-file" id="file">
                        </td>
                    </tr>
                    <tr>
                        <th>����</th>
                        <td>
                            <textarea class="form-control" id="content" rows="5" placeholder="�� ������ �Է��ϼ���"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- ���� ��ư -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">�� �ۼ�</button>
                <button type="reset" class="btn btn-secondary">�ʱ�ȭ</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
