using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerMovement : MonoBehaviour
{
    // reference to RigidBody
    public Rigidbody rb; 

    // speed in which our player will move upwards
    public float upwardSpeed;
    public float speed = 10f;

    void Start()
    {
        // gets run once
        rb = GetComponent<Rigidbody>();
    }

private void Update() {
    //rb.velocity = new Vector3 (0, 0, speed);
}

    void FixedUpdate(){

        // check to see if the user is pressing the Spacebar
        if(Input.GetKey(KeyCode.Space)){
            // once the Space key is pressed, apply force upwards onto gameObject (Player)
            rb.AddForce(new Vector3(0, upwardSpeed));
        }

        // moves cube to the left
        if (Input.GetKey(KeyCode.LeftArrow))
        {
            Debug.Log("Left Arrow was pressed.");
            rb.AddForce(-speed, 0, 0, ForceMode.Impulse);
        }

        // moves cube to the right
        if (Input.GetKey(KeyCode.RightArrow))
        {
            Debug.Log("Right Arrow was pressed.");
            rb.AddForce(speed, 0, 0, ForceMode.Impulse);
        }

        // moves cube to the left
        if (Input.GetKey(KeyCode.A))
        {
            Debug.Log("A key was pressed.");
            rb.AddForce(-speed, 0, 0, ForceMode.Impulse);
        }

        // moves cube to the right
        if (Input.GetKey(KeyCode.D))
        {
            Debug.Log("D key was pressed.");
            rb.AddForce(speed, 0, 0, ForceMode.Impulse);
        }
    }

    // Update is called once per frame
/*   void Update()
    {
        // check to see if the user is pressing the Spacebar
        if(Input.GetKey(KeyCode.Space)){
            // once the Space key is pressed, apply force upwards onto gameObject (Player)
            rb.AddForce(new Vector3(0, upwardSpeed));
        }

                // moves cube to the left
        if (Input.GetKey(KeyCode.A))
        {
            Debug.Log("Left Arrow was pressed.");
            rb.AddForce(-speed, 0, 0, ForceMode.Impulse);
        }

                        // moves cube to the left
        if (Input.GetKey(KeyCode.D))
        {
            Debug.Log("D was pressed.");
            rb.AddForce(speed, 0, 0, ForceMode.Impulse);
        }

        //Detect when the A arrow key is pressed down
        if (Input.GetKey(KeyCode.A)){
            Debug.Log("A key was pressed.");
            rb.velocity = -transform.right * speed;
        }

        //Detect when the A arrow key has been released
        if (Input.GetKeyUp(KeyCode.A)){
            Debug.Log("A key was released.");
        }

    }*/
}
