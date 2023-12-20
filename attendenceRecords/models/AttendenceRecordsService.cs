using Models;
namespace attendenceRecords.Models;

public class AttendenceRecordsService : IAttendenceRecordsService
{
    private List<Member> members = new List<Member>();
     private List<Activity> activities = new List<Activity>();

    public void AddMember(string name){
        members.Add(new Member{Name = name, AttendedActivities=new List<Activity>()});
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

}    