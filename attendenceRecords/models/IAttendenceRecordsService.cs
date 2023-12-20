using System.ServiceModel;
using attendenceRecords.Models;
namespace Models;

[ServiceContract]
public interface IAttendenceRecordsService
{
    [OperationContract]
    double getAttendancePercentage(string name);

    [OperationContract]
    List<Member> GetAttendees(Activity activity);

    [OperationContract]
    void AddActivity(string name, DateTime date, double price, List<Member> attendees);

    [OperationContract]
    void AddMember(string name);

    [OperationContract]
    List<Activity> GetActivitiesWithPrice(double price);

    [OperationContract]
    List<Activity> GetActivitiesOnDate(DateTime date);

    [OperationContract]
    List<Activity> GetActivitiesOfMember(string name);    
}