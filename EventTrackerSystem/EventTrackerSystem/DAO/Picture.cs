using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EventTrackerSystem.DAO
{
  public  class Picture
    {
      public int ID { get; set; }

      public byte[] PICTURE { get; set; }

      public Picture(int id,byte[] picture) {
          this.ID = id;
          this.PICTURE = picture;
      }
    }
}
