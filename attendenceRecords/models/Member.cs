namespace attendenceRecords.Models
{
    public class Member
    {
        public string Name {get; set;}
        public List<Activity> AttendedActivities {get; set;}
    }
}