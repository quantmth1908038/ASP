using System.Linq;
using Microsoft.AspNetCore.Builder;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.EntityFrameworkCore;

namespace HRM.Models
{
    public class SeedData
    {
        public static void EnsurePopulated(IApplicationBuilder app)
        {
            HRMDbContext context = app.ApplicationServices
                .CreateScope().ServiceProvider.GetRequiredService<HRMDbContext>();

            if (context.Database.GetPendingMigrations().Any())
            {
                context.Database.Migrate();
            }

            if (!context.Employees.Any())
            {
                context.Employees.AddRange(
                    new Employee
                    {
                        Name = "Ngoc Trinh",
                        Birthday = "12-02-1989",
                        Address = "Thanh Pho Ho Chi MInh",
                        Image = "https://baodautu.vn/files/2014/09/05/ngoc-trinh-dep-non-na-trong-anh-quang-cao-moi-22048-1.jpg"
                    },
                    new Employee
                    {
                        Name = "Ronald",
                        Birthday = "05-02-1985",
                        Address = "Turin",
                        Image = "https://znews-photo.zadn.vn/w660/Uploaded/bzcwvobl/2020_05_16/Ronaldo.jpg"
                    },
                    new Employee
                    {
                        Name = "Messi",
                        Birthday = "24-06-1987",
                        Address = "Barcelona",
                        Image = "https://media.thethao247.vn/upload/cuongnm/2020/10/16/messi-1-083226-1.jpg"
                    }
                    ,
                    new Employee
                    {
                        Name = "Bill Gates",
                        Birthday = "28-10-1955",
                        Address = "Washington",
                        Image = "https://i.ndh.vn/2019/01/18/7a6bill-gates-africa-1547782838.jpg"
                    },
                    new Employee
                    {
                        Name = "Tim Cook",
                        Birthday = "1-11-1960",
                        Address = "Alabama",
                        Image = "https://www.elleman.vn/wp-content/uploads/2019/10/29/sinh-nhat-tim-cook-7.jpg"
                    }
                );
                context.SaveChanges();
            }
        }
    }
}
