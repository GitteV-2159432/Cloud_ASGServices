namespace attendenceRecords.Models{
    public class Activity
    {
        public string Name {get; set;}
        public DateTime Date {get; set;}
       
        public double Price {get; set;}

        public List<Member>? Attendees {get; set;}
    }
}