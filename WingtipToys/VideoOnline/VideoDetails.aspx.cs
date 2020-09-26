using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.ModelBinding;
using System.Web.UI;
using System.Web.UI.WebControls;
using VideoOnline.Models;

namespace VideoOnline
{
    public partial class VideoDetails : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        public IQueryable<Video> GetVideo([QueryString("VideoID")] int? videoId)
        {
            var _db = new VideoOnline.Models.VideoContext();
            IQueryable<Video> query = _db.Videos;
            if (videoId.HasValue && videoId > 0)
            {
                query = query.Where(p => p.VideoID == videoId);
            }
            else
            {
                query = null;
            }
            return query;
        }
    }
}