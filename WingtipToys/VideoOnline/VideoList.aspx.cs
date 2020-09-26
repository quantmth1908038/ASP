using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using VideoOnline.Models;
using System.Web.ModelBinding;

namespace VideoOnline
{
    public partial class VideoList : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        public IQueryable<Video> GetVideos([QueryString("id")] int? categoryId)
        {
            var _db = new VideoOnline.Models.VideoContext();
            IQueryable<Video> query = _db.Videos;
            if (categoryId.HasValue && categoryId > 0)
            {
                query = query.Where(p => p.CategoryID == categoryId);
            }
            return query;
        }
    }
}