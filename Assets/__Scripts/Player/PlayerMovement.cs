using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerMovement : MonoBehaviour
{
    // reference to RigidBody
    public Rigidbody rb; 

    // speed in which our player will move upwards
    public float upwardSpeed;

    // Update is called once per frame
    void Update()
    {
        // check to see if the user is pressing the Spacebar
        if(Input.GetKey(KeyCode.Space)){
            // once the Space key is pressed, apply force upwards onto gameObject (Player)
            rb.AddForce(new Vector3(0, upwardSpeed));
        }
    }
}
