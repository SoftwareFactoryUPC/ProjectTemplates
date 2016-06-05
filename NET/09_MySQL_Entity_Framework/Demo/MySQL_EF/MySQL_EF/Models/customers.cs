namespace MySQL_EF.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    [Table("software_factory.customers")]
    public partial class customers
    {
        public customers()
        {
            accounts = new HashSet<accounts>();
        }

        [Key]
        public int customer_id { get; set; }

        [Required]
        [StringLength(20)]
        public string full_name { get; set; }

        public virtual ICollection<accounts> accounts { get; set; }
    }
}
