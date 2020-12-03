using Microsoft.EntityFrameworkCore;

namespace HRM.Models
{
    public class HRMDbContext : DbContext
    {
        public HRMDbContext(DbContextOptions<HRMDbContext> options)
            : base(options) { }

        public DbSet<Employee> Employees { get; set; }
    }
}
