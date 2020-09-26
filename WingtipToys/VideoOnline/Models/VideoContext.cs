using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace VideoOnline.Models
{
    public class VideoContext : DbContext
    {
        public VideoContext() : base("VideoOnline")
        {
        }
        public DbSet<Category> Categories { get; set; }
        public DbSet<Video> Videos { get; set; }
    }
}