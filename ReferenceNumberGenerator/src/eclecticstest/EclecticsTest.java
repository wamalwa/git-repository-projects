/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eclecticstest;

import java.util.concurrent.ThreadLocalRandom;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Arrays;
import java.util.Formatter;

/**
 *
 * @author mmutinda
 */
public class EclecticsTest {

    private static final String FILENAME = "/srv/applications/EAP-6.4.0/externalConfigs/InstaPay/ipesarefcounter.txt";

    private static Integer maxLetterIndex;
    private static Integer minLetterIndex;
    private static Integer maxNum;
    private static Integer minNum;

    private static Integer digit1Val;
    private static Integer digit2Val;
    private static Integer digit3Val;
    private static Integer digit4Val;
    private static Integer digit5Val;
    private static Integer digit6Val;

    private static Integer digit7Val;
    private static Integer digit8Val;
    private static Integer digit9Val;
    private static Integer digit10Val;

    private static Integer numVal;

    private static String letter10Val;
    private static String letter9Val;
    private static String letter8Val;
    private static String letter7Val;
    private static String letter6Val;
    private static String letter5Val;
    private static String letter4Val;
    private static String letter3Val;
    private static String letter2Val;
    private static String letter1Val;

    private static String refno;

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic 

        String result = createRefNo();

        System.out.println(result);

    }

    public static String createRefNo() {

        BufferedReader br = null;
        FileReader fr = null;

        String[] letters = {"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"};
        int[] numbers = new int[]{0, 1, 2, 3, 4, 5, 6, 7, 8, 9};

        maxLetterIndex = letters.length - 1;
        minLetterIndex = 0;
        maxNum = 9;
        minNum = 5;

        digit7Val = ThreadLocalRandom.current().nextInt(minLetterIndex, maxLetterIndex);
        digit8Val = ThreadLocalRandom.current().nextInt(minLetterIndex, maxLetterIndex);
        digit9Val = ThreadLocalRandom.current().nextInt(minLetterIndex, maxLetterIndex);
        digit10Val = ThreadLocalRandom.current().nextInt(minLetterIndex, maxLetterIndex);

        letter6Val = "";
        letter5Val = "";
        letter4Val = "";
        letter3Val = "";

        if (digit7Val > maxNum) {
            digit7Val = minNum;
        }
//check if the digit is greater than maximum digit and then change it to minimum
        if (digit8Val > maxLetterIndex) {
            digit8Val = minLetterIndex;
        }
        if (digit9Val > maxLetterIndex) {
            digit9Val = minLetterIndex;
        }
        if (digit10Val > maxLetterIndex) {
            digit10Val = minLetterIndex;
        }
        refno = "";

        String count = "";
        try {

            fr = new FileReader(FILENAME);
            br = new BufferedReader(fr);

            String sCurrentLine;

            br = new BufferedReader(new FileReader(FILENAME));

            while ((sCurrentLine = br.readLine()) != null) {
                count += sCurrentLine;
            }

        } catch (IOException e) {

            e.printStackTrace();

        } finally {

            try {

                if (br != null) {
                    br.close();
                }

                if (fr != null) {
                    fr.close();
                }

            } catch (IOException ex) {

                ex.printStackTrace();

            }

        }
        if (count.isEmpty()) {
            count = "0.0.0.0.0.0";
        }
        String[] positionsString = count.split("\\.");

        int[] positions = new int[positionsString.length];

        for (int i = 0; i < positionsString.length; i++) {
            try {
                positions[i] = Integer.parseInt(positionsString[i]);
            } catch (NumberFormatException e) {
                //NOTE: write something here if you need to recover from formatting errors
            }
        }
        //all the sequencial numbers are assigned values in their respective positions from the file
        digit6Val = positions[5]; //the sixth digit;
        digit5Val = positions[4];
        digit4Val = positions[3];
        digit3Val = positions[2];
        digit2Val = positions[1];
        digit1Val = positions[0];
        //letters
        letter10Val = "";
        letter9Val = "";
        letter8Val = "";
        letter7Val = "";
        letter6Val = "";
        letter5Val = "";
        letter4Val = "";
        letter3Val = "";
        letter2Val = "";
        letter1Val = "";

        //check if the digit is greater than maximum digit and then change it to minimum
        if (digit1Val > maxLetterIndex) {
            digit1Val = minLetterIndex;
        }

        if (digit2Val > maxLetterIndex) {
            digit2Val = minLetterIndex;
            digit1Val = digit1Val + 1;//increase the value of the digit on the left by 1
        }
        if (digit3Val > maxLetterIndex) {

            if (digit3Val < (maxLetterIndex + 10)) {

                numVal = digit3Val - maxLetterIndex;
                for (Integer numberX : numbers) {
                    if (numVal.equals(numberX)) {
                        letter3Val = Integer.toString(numberX);
                    }
                    if (!letter3Val.isEmpty()) {
                        break;
                    }
                }

            } else {
                digit3Val = minLetterIndex;
                digit2Val = digit2Val + 1;//increase the value of the digit on the left by 1
            }
        }

        if (digit4Val > maxNum) {
            digit4Val = minLetterIndex;
            digit3Val = digit3Val + 1;//increase the value of the digit on the left by 1
        } //number
        if (digit5Val > maxLetterIndex) {
            digit5Val = minLetterIndex;
            digit4Val = digit4Val + 1;
        }
        if (digit6Val > maxLetterIndex) {
            digit6Val = minLetterIndex;
            digit5Val = digit5Val + 1;
        }

        int lIndex = 0;
        for (String letterX : letters) {
            //pos 10
            if (digit10Val.equals(lIndex)) {
                letter10Val = letterX;
            }
            //pos 9
            if (digit9Val.equals(lIndex)) {
                letter9Val = letterX;
            }
            //pos 8
            if (digit8Val.equals(lIndex)) {
                letter8Val = letterX;
            }
            //pos 6
            if (digit6Val.equals(lIndex)) {
                letter6Val = letterX;
            }
            //pos 5
            if (digit5Val.equals(lIndex)) {
                letter5Val = letterX;
            }
            //pos 3
            if (digit4Val.equals(lIndex)) {
                letter3Val = letterX;
            }
            //pos 2
            if (digit3Val.equals(lIndex)) {
                letter2Val = letterX;
            }
            //pos 1
            if (digit2Val.equals(lIndex)) {
                letter1Val = letterX;
            }

            if (!letter1Val.isEmpty() && !letter2Val.isEmpty() && !letter3Val.isEmpty() && !letter5Val.isEmpty()
                    && !letter6Val.isEmpty() && !letter8Val.isEmpty() && !letter9Val.isEmpty() && !letter10Val.isEmpty()) {
                break;//stop only if all the letters have been filled up with values
            }
            lIndex++;
        }
        digit6Val = digit6Val + 1;//increament the last index in the sequence
        for (Integer numberX : numbers) {
            //pos 4
            if (digit4Val.equals(numberX)) {
                letter4Val = Integer.toString(numberX);
            }
            if (digit7Val.equals(numberX)) {
                letter7Val = Integer.toString(numberX);
            }

            if (!letter4Val.isEmpty() && !letter7Val.isEmpty()) {
                break;//stop only if all the letters have been filled up with values
            }
        }
        //return all the digits to theier arrays in their indices
        positions[0] = digit1Val;
        positions[1] = digit2Val;
        positions[2] = digit3Val;
        positions[3] = digit4Val;
        positions[4] = digit5Val;
        positions[5] = digit6Val;

        String stringtosave = "";
        for (Integer x : positions) {
            stringtosave += Integer.toString(x) + ".";
            //stringtosave += ".";
        }
        String res = stringtosave.substring(0, stringtosave.length() - 1);
        refno = letter1Val + letter2Val + letter3Val + letter4Val + letter5Val + letter6Val + letter7Val + letter8Val + letter9Val + letter10Val;

        try {
            Formatter f = new Formatter(FILENAME);
            f.format("%s", res + "\r\n");
            f.close();
        } catch (Exception e) {
        }

        return refno;
    }
}
