using System.Runtime.Serialization;

namespace attendenceRecords.Models
{
    [DataContract]
    public class Member
    {
        [DataMember]
        public string Name {get; set;}
        [DataMember]
        public List<Activity> AttendedActivities {get; set;}
    }
}