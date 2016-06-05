namespace MySQL_EF.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    [Table("software_factory.accounts")]
    public partial class accounts
    {
        [Key]
        public int account_id { get; set; }

        public int customer_id { get; set; }

        public float balance { get; set; }

        public virtual customers customers { get; set; }
    }
}
