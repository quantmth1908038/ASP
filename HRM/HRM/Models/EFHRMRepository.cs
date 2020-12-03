using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace HRM.Models
{
    public class EFHRMRepository : IHRMRepository
    {
        private HRMDbContext context;
        public EFHRMRepository(HRMDbContext ctx)
        {
            context = ctx;
        }

        public IQueryable<Employee> Employees => context.Employees;
    }
}
