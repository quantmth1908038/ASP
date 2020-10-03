using GolfClub.DAL;
using GolfClub.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace GolfClub
{
    public partial class CreateMember : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnSubmit_Click(object sender, EventArgs e)
        {
            ClubMemberDbManager objclubMemberDbManager = new ClubMemberDbManager();
            Member memberModel = new Member();
            memberModel.Name = TextBoxName.Text;
            memberModel.Gender = DropDownListGender.SelectedItem.Text;
            memberModel.MemberFee = Convert.ToDouble(TextBoxMembership.Text);
            memberModel = objclubMemberDbManager.CreateMember(memberModel);
            lblMessage.Text = "Member Created Successfully";

        }
    }
}