1. ����� - index.php, � ������� ��������������� �� ������� �������� application/views/main.php
2. � ����� views: 
  ��������, ��������� �����:
    - main.php -  ������� �������� � �����������;
    - signup.php - ����� �����������;
    - login.php - ����� �����;
    - guidelines.php - �������� � �����������;
    - contact.php - �������� � ����������;
  �������� ������� ��������:
    - account.php;
  ���������� �����:
    - content.php.
�� ���� ��������� ����� ����������� Smarty � ��������� �� libs/templates - �����, �����, ���� � �������� ��� ������� � ���������. ��� �� ������������ ����� � ��������.
3. � ����� controllers:
  - ����� Controller, ���������� �� ��������� ������ �� ���� ����;
  - ����� work_signup.php, work_login.php, work_account.php, activation.php, � ������� ��������� ������� ������ Controller, ������� �������� ������ ��� ��������� ������ �� ������ ����� ��������. ����� ��������� ������� ������ Model (����� models), � ������� ���������� ������ ����� ������, ���������� �� ��������� ���� ������. 
4. � ����� models:
  - ���������� ���� ����� Model (��� ������ � �������������);
  - ���� config.php � ����������� ��;
  - ���� db.php - ���������� � ��.
5. � ������� ���������� ����� � ������� ������ - �������� � ��� ������������ ���� �������������� ���������� � ������ ��������.
6. � ������� ���������� ����� � js-���������:
  - form.js, form1.js, form2.js - �������� ����� ���� ����;
  - change_info.js - ����� � �������������� ���������� �� ����������� ����;
  - ������� jquery, arcticmodal.