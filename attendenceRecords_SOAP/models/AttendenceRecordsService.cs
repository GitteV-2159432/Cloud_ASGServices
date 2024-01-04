using Models;
namespace attendenceRecords.Models;

public class AttendenceRecordsService : IAttendenceRecordsService
{
    private static Dictionary<string, List<Activity>> memberActivities = new();
    private int totalActivities = 0;


    public double GetAttendancePercentage(string name){
        if(!memberActivities.ContainsKey(name)){
            return 0.0;
        }
        int activities = memberActivities[name].Count;
        double percentage = (activities/totalActivities)*100;
        return percentage;
    }
    


    public void AddActivity(string name, DateTime date, double price, List<string> attendees){
        var activity = new Activity{
            Name=name, 
            Date=date, 
            Price=price, 
            Attendees=attendees
        };

        foreach(var attendee in attendees){
            if(!memberActivities.ContainsKey(attendee)){
                memberActivities[attendee] = new List<Activity>();
            }
            memberActivities[attendee].Add(activity);
        }
        totalActivities = totalActivities + 1;
    }
   

    public List<Activity> GetActivitiesOfMember(string name){
        return memberActivities[name];
    }

  

    public List<string> GetMembers(){
        List<string> members = new List<string>();
        foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
            members.Add(pair.Key);
        }
        return members;
    }

    public List<Activity> GetActivities(){
        List<Activity> activities = new List<Activity>();
        foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
            foreach(Activity activity in pair.Value){
                if(!activities.Contains(activity)){
                    activities.Add(activity);
                }
            }
        }
        return activities;
    }

    public int ActivitiesAttended(string name){
         if(!memberActivities.ContainsKey(name)){
            return 0;
        }
        int activities = memberActivities[name].Count;
        return activities;
    }

    private Activity FindActivity(string activityName){
        foreach(string key in memberActivities.Keys){
            foreach(Activity activity in memberActivities[key]){
                if(activity.Name == activityName){
                    return activity;
                }
            }
        }
        return null;
    }

    public List<string> GetAttendees(string activityName){
        Activity activity = FindActivity(activityName);
        List<string> attendees = new List<string>();
        foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
            if(pair.Value.Contains(activity)){
                attendees.Add(pair.Key);
            }
        }
        return attendees;
    }

    public DateTime GetActivityDate(string activityName){
        Activity activity = FindActivity(activityName);

        return activity.Date;
    }

    
    public double GetActivityPrice(string activityName){
        Activity activity = FindActivity(activityName);

        return activity.Price;
    }
} 