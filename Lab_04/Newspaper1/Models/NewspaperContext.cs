using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

namespace Newspaper1.Models
{
    public partial class NewspaperContext : DbContext
    {
        public NewspaperContext()
        {
        }

        public NewspaperContext(DbContextOptions<NewspaperContext> options)
            : base(options)
        {
        }

        public virtual DbSet<News> News { get; set; }
        public virtual DbSet<Post> Post { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. See http://go.microsoft.com/fwlink/?LinkId=723263 for guidance on storing connection strings.
                optionsBuilder.UseSqlServer("Server=DESKTOP-ONJFSA3\\SQLEXPRESS;Database=Newspaper;Trusted_Connection=True;");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<News>(entity =>
            {
                entity.Property(e => e.Sections).IsRequired();
            });

            modelBuilder.Entity<Post>(entity =>
            {
                entity.HasOne(d => d.News)
                    .WithMany(p => p.Post)
                    .HasForeignKey(d => d.NewsId);
            });
        }
    }
}
