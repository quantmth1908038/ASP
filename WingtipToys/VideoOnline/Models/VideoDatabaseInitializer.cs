using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace VideoOnline.Models
{
    public class VideoDatabaseInitializer : DropCreateDatabaseIfModelChanges<VideoContext>
    {
        protected override void Seed(VideoContext context)
        {
            GetCategories().ForEach(c => context.Categories.Add(c));
            GetVideos().ForEach(p => context.Videos.Add(p));
        }
        private static List<Category> GetCategories()
        {
            var categories = new List<Category> {
                new Category
                {
                    CategoryID = 1,
                    CategoryName = "Musics"
                },
                new Category
                {
                    CategoryID = 2,
                    CategoryName = "Games"
                },
                new Category
                {
                    CategoryID = 3,
                    CategoryName = "Cooks"
                },
                new Category
                {
                    CategoryID = 4,
                    CategoryName = "Travel"
                },
            };

            return categories;
        }

        private static List<Video> GetVideos()
        {
            var Videos = new List<Video> {
                new Video
                {
                    VideoID = 1,
                    Channel = "Jenny Remix",
                    Title = "NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix gây nghiện 2020 của Jenny Remix",
                    Thumbnail = "https://i.ytimg.com/vi/S7sCw0fxUgc/hq720.jpg?sqp=-oaymwEZCOgCEMoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLCsvTONoWadDwAUZux62eSWys0eMg",
                    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                    CategoryID = 1
                },
                new Video
                {
                    VideoID = 2,
                    Channel = "Nam Việt Music",
                    Title = "Nhạc Trẻ Mới Hay Nhất Tháng 2020 | 30 Bài Hát Nhạc Trẻ Hay Nhất Hiện Nay 2020 - Nhạc Trẻ Tuyển Chọn của Nam Việt Music",
                    Thumbnail = "https://i.ytimg.com/vi/DFoecq-wBSE/hq720.jpg?sqp=-oaymwEZCOgCEMoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLBWz-rqXbkEq0DE2hhWx65y6ov6lg",
                    LinkVideo = "https://www.youtube.com/embed/DFoecq-wBSE",
                    CategoryID = 1
                },
                new Video
                {
                    VideoID = 3,
                    Channel = "J97",
                    Title = "Jack | Hoa Hải Đường | Official Music Video của J97",
                    Thumbnail = "https://i.ytimg.com/vi/Bhg-Gw953b0/hq720.jpg?sqp=-oaymwEZCOgCEMoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLB6fhvga00oJwH5NvycMhiwX-04xg",
                    LinkVideo = "https://www.youtube.com/embed/Bhg-Gw953b0",
                    CategoryID = 1
                },
                new Video
                {
                    VideoID = 4,
                    Channel = "Phân Tích Game",
                    Title = "Phân tích game : AMONG US | Game Explained | PTG",
                    Thumbnail = "https://i.ytimg.com/vi/W_61fSJK_2Q/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLBXllAfwFN6s8ZeIIqLBY6hWFoYdg",
                    LinkVideo = "https://www.youtube.com/embed/W_61fSJK_2Q",
                    CategoryID = 2
                },
                new Video
                {
                    VideoID = 5,
                    Channel = "meGAME",
                    Title = "Giả Thuyết Game: Khủng Long Rớt Mạng | Chrome Dino Game - meGAME",
                    Thumbnail = "https://i.ytimg.com/vi/c-E3UOLfjC4/hq720.jpg?sqp=-oaymwEZCOgCEMoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDmzH1UdRtJX6mV0H7aW2Dz7lW0EQ",
                    LinkVideo = "https://www.youtube.com/embed/c-E3UOLfjC4",
                    CategoryID = 2
                },
                //new Video
                //{
                //    VideoID = 6,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 2
                //},
                //new Video
                //{
                //    VideoID = 7,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 3
                //},
                //new Video
                //{
                //    VideoID = 8,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 3
                //},
                //new Video
                //{
                //    VideoID = 9,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 3
                //},
                //new Video
                //{
                //    VideoID = 10,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 4
                //},
                //new Video
                //{
                //    VideoID = 11,
                //    Channel = "",
                //    Title = "",
                //    Thumbnail = "",
                //    LinkVideo = "https://www.youtube.com/embed/S7sCw0fxUgc",
                //    CategoryID = 4
                //},

            };

            return Videos;
        }
    }
}