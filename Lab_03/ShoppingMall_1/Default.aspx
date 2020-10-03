<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="ShoppingMall_1.Default" %>

<%@ Register Src="~/UserControl/LeftMessage.ascx" tagPrefix="uc1" tagName="LeftMessage" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <uc1:LeftMessage runat="server" ID="LeftMessage" />
        </div>
        <h3>Welcome!! Go for Shopping</h3>
        <div>

        </div>
    </form>
</body>
</html>
