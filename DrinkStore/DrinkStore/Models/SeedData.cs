using System.Linq;
using Microsoft.AspNetCore.Builder;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.EntityFrameworkCore;

namespace DrinkStore.Models
{
    public class SeedData
    {
        public static void EnsurePopulated(IApplicationBuilder app)
        {
            StoreDbContext context = app.ApplicationServices
                .CreateScope().ServiceProvider.GetRequiredService<StoreDbContext>();

            if (context.Database.GetPendingMigrations().Any())
            {
                context.Database.Migrate();
            }

            if (!context.Products.Any())
            {
                context.Products.AddRange(
                    new Product
                    {
                        Name = "Pepsi",
                        Description = "Gubergren hendrerit ut est cum accusam kasd amet labore suscipit sit stet rebum option ipsum ut sit tempor kasd facer",
                        Image = "https://www.pepsi.com/en-us/uploads/images/twil-can.png",
                        Category = "A",
                        Price = 275
                    },
                    new Product
                    {
                        Name = "CocaCola",
                        Description = "Sit lorem kasd amet erat dolor amet praesent takimata takimata sed consetetur sit et vel tempor volutpat no dolore in",
                        Image = "https://redbottle.com.au/wp-content/uploads/2018/05/coca-cola-375ml-can.png",
                        Category = "A",
                        Price = 48.95m
                    },
                    new Product
                    {
                        Name = "Fanta",
                        Description = "Et eros diam amet lobortis eum et consetetur vero takimata dolor et amet dolor diam kasd sed sea voluptua ut",
                        Image = "https://cdn3.volusion.com/fqzgh.xmhmk/v/vspfiles/photos/FANTA-01-2.jpg?v-cache=1523337944",
                        Category = "A",
                        Price = 19.50m
                    },
                    new Product
                    {
                        Name = "Orange juice",
                        Description = "Feugait consetetur elitr diam vero takimata et rebum duo iriure blandit et eos diam enim assum no sadipscing esse est",
                        Image = "https://www.earthfoodandfire.com/wp-content/uploads/2018/04/Homemade-Orange-Juice.jpg",
                        Category = "B",
                        Price = 34.95m
                    },
                    new Product
                    {
                        Name = "Apple juice",
                        Description = "Vero no diam facilisis facer et dolor vero voluptua nam sit ut volutpat ipsum eos sed dolores at erat est",
                        Image = "https://5.imimg.com/data5/YB/FP/MY-24215181/apple-juice-500x500.jpg",
                        Category = "B",
                        Price = 79500
                    },
                    new Product
                    {
                        Name = "Milk Tea",
                        Description = "Rebum consetetur hendrerit dolore duis in diam suscipit et lorem est iriure eirmod et erat accusam diam feugiat diam volutpat",
                        Image = "https://www.thespruceeats.com/thmb/EfrUsdATrAjnDVAJJ9LhromYIok=/960x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/bubble-tea-recipe-694162-hero-02-e428d92163814642903b12c5ac14de24.jpg",
                        Category = "C",
                        Price = 16
                    },
                    new Product
                    {
                        Name = "Brown Sugar Milk",
                        Description = "Volutpat et lorem sit labore clita sanctus amet no esse kasd elitr kasd est vulputate erat amet amet dolores dolor",
                        Image = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQBHwHqWvycX7kcmAd6rdoh5UCic_oHZxoS3A&usqp=CAU",
                        Category = "C",
                        Price = 29.95m
                    },
                    new Product
                    {
                        Name = "Coffee",
                        Description = "Elitr sanctus diam eos invidunt et volutpat ea elitr ipsum lorem et autem dolor ipsum sadipscing erat elitr magna amet",
                        Image = "https://upload.wikimedia.org/wikipedia/commons/4/45/A_small_cup_of_coffee.JPG",
                        Category = "D",
                        Price = 75
                    },
                    new Product
                    {
                        Name = "Cappuccino",
                        Description = "Eirmod stet duo zzril sadipscing clita amet erat blandit ut",
                        Image = "https://upload.wikimedia.org/wikipedia/commons/4/45/A_small_cup_of_coffee.JPG",
                        Category = "Chess",
                        Price = 1200
                    }
                );
                context.SaveChanges();
            }
        }
    }
}
