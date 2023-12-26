using System.CodeDom;
using System.Text;
using Models;
namespace attendenceRecords.Models;

public class AttendenceRecordsService : IAttendenceRecordsService
{
    private List<Member> members = new List<Member>();
    private List<Activity> activities = new List<Activity>();
    public AttendenceRecordsService(){
        AddSamples(6);
    }
    public void AddMember(string name){
        var member = members.FirstOrDefault(a=>a.Name == name);
        if(member == null){
            members.Add(new Member{Name = name, AttendedActivities=new List<Activity>()});
        }
    }

    public double getAttendancePercentage(string name){
        var member = members.FirstOrDefault(a=>a.Name==name);
        if(member != null){
            int attended = member.AttendedActivities.Count;
            int total = activities.Count;
            return attended/total *100;
        }
        return 0.0;
    }
    
    public List<Member> GetAttendees(Activity activity){
        return new List<Member>();
    }

    public void AddActivity(string name, DateTime date, double price, List<Member> attendees){
        var activity = new Activity{Name=name, Date=date, Price=price, Attendees=attendees};
        activities.Add(activity);
        foreach(var attendee in attendees){
            var attendeeName = attendee.Name;
            var member = members.FirstOrDefault(a=>a.Name == attendeeName);
            if(member != null){
                member.AttendedActivities.Add(activity);
            }else{
                var attendedActivities = new List<Activity>{activity};
                members.Add(new Member{Name = name, AttendedActivities=attendedActivities});
            }
        }
    }

    public List<Activity> GetActivitiesWithPrice(double price){
        return activities.Where(a => a.Price == price).ToList();
    }

    public List<Activity> GetActivitiesOnDate(DateTime date){
        return activities.Where(a => a.Date == date).ToList();
    }

    public List<Activity> GetActivitiesOfMember(string name){
        var member = members.FirstOrDefault(a=>a.Name==name);
        if(member != null){
            return member.AttendedActivities;
        }
        return new List<Activity>();
    }



    private List<Member> AddSampleMembers(int numberOfUsers)
    {
        for (int i = 1; i == numberOfUsers; i++)
        {
            string name = "Member"+i;
            var member = members.FirstOrDefault(a=>a.Name == name);
            if(member == null){
                members.Add(new Member{Name = name, AttendedActivities=new List<Activity>()});
            }
        }
        return members;
    }

    private void AddSampleActivities(int numberOfActivities)
    {
        for (int i = 0; i < numberOfActivities; i++)
        {
            Random random = new();
            string actName = "Activity" +i;
            double price = Math.Round(random.NextDouble() * 10);
            List<Member> attendees = members;

            var activity = new Activity
            {
                Name=actName,
                Date= DateTime.Now,
                Price=price,
                Attendees=attendees
            };
            activities.Add(activity);
        }
    }
    public void AddSamples(int amount){
        AddSampleMembers(25);
        AddSampleActivities(amount);
    }

    public List<Member> GetMembers(){
        for (int i=0; i<members.Count; i++){
            Console.WriteLine(members[i]);
        }
        Console.WriteLine("GetMembers");
        return members;
    }
}
  