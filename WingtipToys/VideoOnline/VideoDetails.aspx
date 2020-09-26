<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="VideoDetails.aspx.cs" Inherits="VideoOnline.VideoDetails" %>
<asp:Content ID="Content1" ContentPlaceHolderID="MainContent" runat="server">
    <asp:FormView ID="videoDetail" runat="server" ItemType="VideoOnline.Models.Video" SelectMethod ="GetVideo" RenderOuterTable="false">
        <ItemTemplate>
            <%--<div>
                <h1><%#:Item.Title %></h1>
            </div>--%>
            <br />
            <table>
                <tr>
                    <td>
                        <iframe width="560" height="315" src="<%#:Item.LinkVideo %>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </td>
                    <td>&nbsp;</td>  
                    <td style="vertical-align: top; text-align:left;">
                        <b>Description:</b><br /><%#:Item.Title %>
                        <br />
                        <span><%#: Item.Channel %></span>
                        <br />
                        
                    </td>
                </tr>
            </table>
        </ItemTemplate>
    </asp:FormView>
</asp:Content>
