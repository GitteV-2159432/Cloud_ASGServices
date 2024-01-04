using System.Runtime.Serialization;

namespace attendenceRecords.Models{
    [DataContract]
    public class Activity
    {
        [DataMember]
        public string Name {get; set;}
        [DataMember]
        public DateTime Date {get; set;}
       [DataMember]
        public double Price {get; set;}
        [DataMember]
        public List<string> Attendees {get; set;}
    }
}