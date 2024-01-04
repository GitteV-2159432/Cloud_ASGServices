using System.Runtime.Serialization;

namespace Models{
    
    [DataContract]
    public class Activity
    {
        [DataMember]
        public string Name {get; set;}
        [DataMember]
        public DateTime Date {get; set;}
       [DataMember]
        public double Price {get; set;}
    }
}