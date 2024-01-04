using System.ServiceModel;
using attendenceRecords.Models;
namespace Models;

[ServiceContract]
public interface IAttendenceRecordsService
{
    
    [OperationContract]
    List<string> GetAttendees(string activityName);

    [OperationContract]
    void AddActivity(string name, DateTime date, double price, List<string> attendees);

    [OperationContract]
    List<string> GetMembers();

    
    [OperationContract]
    List<Activity> GetActivities();
    
    [OperationContract]
    DateTime GetActivityDate(string activityName);

    [OperationContract]
    double GetActivityPrice(string activityName);

    [OperationContract]
    double GetAttendancePercentage(string name);

    [OperationContract]
    int ActivitiesAttended(string name);

}