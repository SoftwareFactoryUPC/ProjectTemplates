namespace MySQL_EF.Models
{
    using System;
    using System.Data.Entity;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Linq;

    public partial class Model : DbContext
    {
        public Model()
            : base("name=MySQL")
        {
        }

        public virtual DbSet<accounts> accounts { get; set; }
        public virtual DbSet<customers> customers { get; set; }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Entity<customers>()
                .Property(e => e.full_name)
                .IsUnicode(false);

            modelBuilder.Entity<customers>()
                .HasMany(e => e.accounts)
                .WithRequired(e => e.customers)
                .WillCascadeOnDelete(false);
        }
    }
}
