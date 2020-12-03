using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace HRM.Models
{
    public class Employee
    {
        public long Id { get; set; }
        public string Name { get; set; }
        public string Image { get; set; }
        public string Birthday { get; set; }
        public string Address { get; set; }
    }
}
