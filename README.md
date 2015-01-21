# ZendRbacModule

A bridge for the the [ZfcRbac](https://github.com/ZF-Commons/zfc-rbac) module.

- - - 

*This is currently a work-in-progress, and should not be used.* 

### The plan:

Create a module which bridges

  - ZfCommons\ZfRbac
  - ZfCampus\OAuth2
  - User as IdentityInterface (maybe?)
  - ZendRestModule (maybe?, for restful resource permisisons)
  
Nice to haves:

  - Annotations for ControllerPermissionGuards
  - JMSSerializer handler for User permissions
      (serializes AuthService?)