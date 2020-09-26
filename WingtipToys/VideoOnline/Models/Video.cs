using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace VideoOnline.Models
{
    public class Video
    {
        [ScaffoldColumn(false)]
        public int VideoID { get; set; }

        [Required, StringLength(300), Display(Name = "Channel")]
        public string Channel { get; set; }

        [Required, StringLength(3000), Display(Name = "Title"), DataType(DataType.MultilineText)]
        public string Title { get; set; }

        public string Thumbnail { get; set; }

        public string LinkVideo { get; set; }

        public int? CategoryID { get; set; }

        public virtual Category Category { get; set; }
    }
}